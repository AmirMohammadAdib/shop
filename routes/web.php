<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Content\CategoryController As CategoryContent;
use App\Http\Controllers\Admin\Content\CommentController As CommentContent;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\User\UserAdminController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Setting\SettingController;


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix("admin")->group(function() {
    Route::get("/", [AdminDashboardController::class, 'index'])->name("admin.index");

    Route::prefix("market")->group(function () {
        Route::resource("category", CategoryController::class);
        Route::resource("brand", BrandController::class);
        Route::resource("comment", CommentController::class)->only(["index", "show", "destroy"]);
        Route::resource("delivery", DeliveryController::class);

        Route::prefix("discount")->group(function () {
            Route::get("/coupon", [DiscountController::class, "coupon"])->name("discount.coupon.index");
            Route::get("/coupon/create", [DiscountController::class, "couponCreate"])->name("discount.coupon.create");
            Route::get("/common-discount", [DiscountController::class, "commonDiscount"])->name("discount.commonDiscount.index");
            Route::get("/common-discount/create", [DiscountController::class, "couponCreateCreate"])->name("discount.commonDiscount.create");
            Route::get("/amazing-sale", [DiscountController::class, "amazingSale"])->name("discount.amazingSale.index");
            Route::get("/amazing-sale/create", [DiscountController::class, "amazingSaleCreate"])->name("discount.amazingSale.create");
        });

        Route::prefix("order")->group(function () {
            Route::get("/", [OrderController::class, "all"])->name("order.all");
            Route::get("/new-order", [OrderController::class, "newOrders"])->name("order.newOrders");
            Route::get("/sending", [OrderController::class, "sending"])->name("order.sending");
            Route::get("/unpaid", [OrderController::class, "unpaid"])->name("order.unpaid");
            Route::get("/canceled", [OrderController::class, "canceled"])->name("order.canceled");
            Route::get("/returned", [OrderController::class, "returned"])->name("order.returned");
            Route::get("/show", [OrderController::class, "show"])->name("order.show");
            Route::get("/change-send-status", [OrderController::class, "changeSendStatus"])->name("order.changeSendStatus");
            Route::get("/change-order-status", [OrderController::class, "changeOrderStatus"])->name("order.changeOrderStatus");
            Route::get("/cancel-order", [OrderController::class, "cancelOrder"])->name("order.cancelOrder");
        });

        Route::prefix("payment")->group(function () {
            Route::get("/", [PaymentController::class, "index"])->name("payment.index");
            Route::get("/online", [PaymentController::class, "online"])->name("payment.online");
            Route::get("/offline", [PaymentController::class, "offline"])->name("payment.offline");
            Route::get("/attendance", [PaymentController::class, "attendance"])->name("payment.attendance");
            Route::get("/confirm", [PaymentController::class, "confirm"])->name("payment.confirm");
        });

        Route::resource("product", ProductController::class);
        Route::prefix("product")->group(function () {
            //gallery
            Route::resource("gallery", GalleryController::class)->only(['index', 'store', 'destroy']);
        });

        Route::resource("property", PropertyController::class);
        Route::resource("store", StoreController::class)->only(["index", "store", "edit", "update", "destroy"]);
        Route::get("store/add-to-store", [StoreController::class, "addToStore"])->name("store.addToStore");
    });

    Route::prefix("content")->group(function () {
        Route::prefix("category")->group(function () {
            Route::get("/", [CategoryContent::class, "index"])->name("content.category.index");
            Route::get("/create", [CategoryContent::class, "create"])->name("content.category.create");
            Route::post("/store", [CategoryContent::class, "store"])->name("content.category.store");
            Route::get("/edit/{id}", [CategoryContent::class, "edit"])->name("content.category.edit");
            Route::put("/update/{id}", [CategoryContent::class, "update"])->name("content.category.update");
            Route::delete("/destroy/{id}", [CategoryContent::class, "destroy"])->name("content.category.destroy");
        });

        Route::prefix("comment")->group(function () {
            Route::get("/", [CommentContent::class, "index"])->name("content.comment.index");
            Route::get("/show/{id}", [CommentContent::class, "show"])->name("content.comment.show");
            Route::delete("/destroy/{id}", [CommentContent::class, "destroy"])->name("content.comment.destroy");
        });

        Route::resource("faq", FAQController::class);
        Route::resource("menu", MenuController::class);
        Route::resource("page", PageController::class);
        Route::resource("post", PostController::class);
    });

    Route::prefix("user")->group(function () {
        Route::resource("user-admin", UserAdminController::class);
        Route::resource("customer", CustomerController::class);
        Route::resource("role", RoleController::class);
    });

    Route::prefix("notify")->group(function () {
        Route::resource("email", EmailController::class);
        Route::resource("sms", SMSController::class);
    });

    Route::resource("ticket", TicketController::class);
    Route::prefix("ticket")->group(function () {
        Route::get("new-tickets", [TicketController::class, "newTicket"])->name("ticket.newTicket");
        Route::get("open-tickets", [TicketController::class, "openTicket"])->name("ticket.openTicket");
        Route::get("close-tickets", [TicketController::class, "closeTicket"])->name("ticket.closeTicket");
    });

    Route::resource("setting", SettingController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
