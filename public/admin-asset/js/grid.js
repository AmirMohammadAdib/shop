$(document).ready(function () {

    function removeAllSidebarToggleClass() {
        $("#sidebar_toggle_hide").removeClass("d-md-inline")
        $("#sidebar_toggle_hide").removeClass("d-none")
        $("#sidebar_toggle_show").removeClass("d-inline")
        $("#sidebar_toggle_show").removeClass("d-md-none")
    }

    $('#sidebar_toggle_hide').click(function () {
        $('#sidebar').fadeOut(300)
        $("#main-body").animate({ width: "100%" }, 300)

        setTimeout(() => {
            removeAllSidebarToggleClass();
            $("#sidebar_toggle_hide").addClass("d-none")
            $("#sidebar_toggle_show").removeClass("d-none")

        }, 300);
    })

    $('#sidebar_toggle_show').click(function () {
        $('#sidebar').fadeIn(300)

        removeAllSidebarToggleClass();
        $("#sidebar_toggle_hide").removeClass("d-none")
        $("#sidebar_toggle_show").addClass("d-none")
    })

    $("#menu_toggle").click(function () {
        $("#body_header").toggle(300)
    })

    $(".sidebar-group-link").click(function () {
        $(".sidebar-group-link").removeClass("sidebar-group-link-active")
        $(".sidebar-group-link").children(".sidebar-dropdown-toggle").children(".angle").removeClass("fa-angle-down")
        $(".sidebar-group-link").children(".sidebar-dropdown-toggle").children(".angle").addClass("fa-angle-left")

        $(this).addClass("sidebar-group-link-active")
        $(this).children(".sidebar-dropdown-toggle").children(".angle").removeClass("fa-angle-left")
        $(this).children(".sidebar-dropdown-toggle").children(".angle").addClass("fa-angle-down")
    })

})


function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen()
        } else if (document.documentElement.mozRequestFullscreen) {
            document.documentElement.mozRequestFullscreen()
        } if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
        }

        $('.fa-compress').removeClass("d-none")
        $('.fa-expand').addClass("d-none")
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
        $('.fa-compress').addClass("d-none")
        $('.fa-expand').removeClass("d-none")
    }
}

$("#full_screen").click(function () {
    toggleFullScreen();
})
