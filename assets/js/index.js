/* Hàm mở form */
function moForm() {
    document.getElementById("wrapper").style.display = "block";
    document.getElementById("chat-circle").style.display = "none";

}
/*Hàm Đóng Form*/
function dongForm() {
    document.getElementById("wrapper").style.display = "none";
    document.getElementById("chat-circle").style.display = "block";

}
/* back to top */
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        document.getElementById("backToTop").style.display = "block";
    } else {
        document.getElementById("backToTop").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
