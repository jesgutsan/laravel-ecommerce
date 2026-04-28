function togglePassword(id) {
    let input = document.getElementById(id);
    if (input.type === "password") {
        input.setAttribute("type", "text");
    } else {
        input.setAttribute("type", "password");
    }
}

