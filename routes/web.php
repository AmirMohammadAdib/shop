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


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix("admin")->group(function(){
    Route::get("/", [AdminDashboardController::class, 'index'])->name("admin.index");

    Route::prefix("market")->group(function(){
        Route::resource("category", CategoryController::class);
        Route::resource("brand", BrandController::class);
        Route::resource("comment", CommentController::class)->only(["index", "show", "destroy"]);
        Route::resource("delivery", DeliveryController::class);

        Route::prefix("discount")->group(function() {
            Route::get("/coupon", [DiscountController::class, "coupon"])->name("discount.coupon.index");
            Route::get("/coupon/create", [DiscountController::class, "couponCreate"])->name("discount.coupon.create");
            Route::get("/common-discount", [DiscountController::class, "commonDiscount"])->name("discount.commonDiscount.index");
            Route::get("/common-discount/create", [DiscountController::class, "couponCreateCreate"])->name("discount.commonDiscount.create");
            Route::get("/amazing-sale", [DiscountController::class, "amazingSale"])->name("discount.amazingSale.index");
            Route::get("/amazing-sale/create", [DiscountController::class, "amazingSaleCreate"])->name("discount.amazingSale.create");
        });

        Route::prefix("order")->group(function() {
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

        Route::prefix("payment")->group(function() {
            Route::get("/", [PaymentController::class, "index"])->name("payment.index");
            Route::get("/online", [PaymentController::class, "online"])->name("payment.online");
            Route::get("/offline", [PaymentController::class, "offline"])->name("payment.offline");
            Route::get("/attendance", [PaymentController::class, "attendance"])->name("payment.attendance");
            Route::get("/confirm", [PaymentController::class, "confirm"])->name("payment.confirm");
        });

        Route::resource("product", ProductController::class);
        Route::prefix("product")->group(function() {
            //gallery
            Route::resource("gallery", GalleryController::class)->only(['index', 'store', 'destroy']);
        });
    });
});
