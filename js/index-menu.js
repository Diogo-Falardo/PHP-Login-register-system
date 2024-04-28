////////////////////////////////////////////////////////// //
// This Script Manipulates The Initial Menu Of the WebPage //
// Script made by Diogo Falardo 18/03/2024                 //
////////////////////////////////////////////////////////// //

function mid_menu_off(){
    const mid_menu = document.getElementById("mid-menu");
    mid_menu.style.display="none";
    const rights_reserved = document.getElementById("rights-reserved").style.display = "none";

}

function active_return_button(){
    const btn_arrow = document.getElementById("btn-arrow").style.display = "block";
}

function go_back(){
    // The ones that turn visible
    const mid_menu = document.getElementById("mid-menu").style.display = "block";
    const rights_reserved = document.getElementById("rights-reserved").style.display = "block";
    // The one that are not shown
    const btn_arrow = document.getElementById("btn-arrow").style.display = "none";
    const login_menu = document.getElementById("login-menu").style.display = "none";
    const register_menu = document.getElementById("register-menu").style.display="none";
    const recovery_password = document.getElementById("recovery-menu").style.display="none";
    // location.reload();
}

function login_menu(){
    mid_menu_off();
    active_return_button();
    const login_menu = document.getElementById("login-menu").style.display="block";

}

function register_menu(){
    mid_menu_off();
    active_return_button();
    const register_menu = document.getElementById("register-menu").style.display="block";
}

function recovery_menu(){
    mid_menu_off()
    active_return_button();
    const recovery_menu = document.getElementById("recovery-menu").style.display="block";
}