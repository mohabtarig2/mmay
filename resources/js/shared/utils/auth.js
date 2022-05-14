
export function isLoggedIn() {
    return localStorage.getItem("isLoggedIn") == 'true';
}

export function logIn() {
    localStorage.setItem("isLoggedIn", true);
}



export function logOut() {
    localStorage.removeItem("isLoggedIn");
}


export function isAdminLoggedIn() {
    return localStorage.getItem("isAdminLoggedIn") == 'true';
}

export function logAdminIn() {
    localStorage.setItem("isAdminLoggedIn", true);
}

export function logAdminOut() {
    localStorage.setItem("isAdminLoggedIn", false);
}
