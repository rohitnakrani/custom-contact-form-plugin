#ccfp-contact-form {
    max-width: 500px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
    background: #fff0f0;
    border-radius: 10px;
}

#ccfp-contact-form input,
#ccfp-contact-form textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

#ccfp-contact-form button {
    background: #ff5555;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

#ccfp-response {
    margin-top: 10px;
    font-weight: bold;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #8a1f1c;
}

.container {
    display: flex;
    /* width: 90%; */
    max-width: 1400px;
    margin: 50px auto;
    background: url('http://localhost/Figma-Design/wp-content/uploads/2025/05/Contact-Us-new.png') no-repeat center center;
    background-size: 100% 100%;
    border-radius: 25px;
    overflow: hidden;
}

.left,
.right {
    flex: 1;
    padding: 40px;
    position: relative;
}

.logo {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 50px;
}

h1 {
    font-size: 48px;
    color: #f13a17;
}

.collage {
    position: relative;
    margin-top: 80px;
}

.statue {
    width: 200px;
    position: relative;
    z-index: 2;
}

.hand-left,
.hand-right {
    position: absolute;
    width: 191px;
    z-index: 1;
}

.hand-left {
    bottom: -477px;
    left: -106px;
}

.hand-right {
    top: 0;
    right: 0;
}

.yellow-circle,
.white-circle {
    position: absolute;
    border-radius: 50%;
    z-index: 0;
}

.yellow-circle {
    width: 150px;
    height: 150px;
    background: #ffd42d;
    top: 0;
    left: 50px;
}

.white-circle {
    width: 100px;
    height: 100px;
    background: white;
    bottom: 0;
    right: 50px;
}

.circle-text svg {
    position: absolute;
    bottom: 0;
    left: 30%;
    width: 200px;
    height: 200px;
}

.right .top-right {
    display: flex;
    justify-content: end;
    align-items: center;
}

.menu-icon div {
    width: 25px;
    height: 3px;
    background: #f13a17;
    margin: 4px 0;
}

.form-box {
    margin-top: 201px;
    text-align: right;
}

form {
    display: flex;
    flex-direction: column;
}

input,
textarea {
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #f13a17;
    font-size: 16px;
}

button {
    padding: 15px;
    background: #f13a17;
    color: white;
    font-size: 18px;
    border: none;
    margin-top: 20px;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
        margin: 20px;
        border-radius: 15px;
        /* background: #ddd; */
        background: url('http://localhost/Figma-Design/wp-content/uploads/2025/05/cp.png') no-repeat center center;
    }
    .left,
    .right {
        padding: 10px;
    }
    .form-box {
        margin-top: 31px;
        font-size: 14px;
    }
    h1 {
        font-size: 36px;
        text-align: center;
    }
    .collage {
        text-align: center;
        margin-top: 40px;
    }
    .statue {
        width: 150px;
    }
    .hand-left,
    .hand-right {
        width: 70px;
    }
    .hand-left {
        /* left: 0;
        bottom: -10px; */
    }
    .hand-right {
        right: 0;
        top: 10px;
    }
    .logo {
        width: 40px;
        top: 10px;
        left: 10px;
    }
    form input,
    form textarea {
        font-size: 16px;
    }
    form button {
        font-size: 16px;
        padding: 12px;
    }
}

.lets-talk-img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}
