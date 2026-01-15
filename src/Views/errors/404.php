<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TalentHub - Page Not Found</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
}

body{
    height:100vh;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    color:white;
}

.container{
    text-align:center;
    z-index:2;
}

h1{
    font-size:120px;
    color:#00ffd5;
    animation: bounce 1.5s infinite;
}

h2{
    margin-bottom:10px;
    color:#ffffff;
}

p{
    opacity:0.8;
    margin-bottom:20px;
}

a{
    text-decoration:none;
    padding:12px 25px;
    background:#00ffd5;
    color:#0f2027;
    border-radius:25px;
    font-weight:bold;
    transition:0.3s;
}

a:hover{
    background:transparent;
    color:#00ffd5;
    border:2px solid #00ffd5;
}

/* animation 404 */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* background floating shapes */
.circle{
    position:absolute;
    border-radius:50%;
    background:rgba(0, 255, 213, 0.15);
    filter: blur(1px);
    animation: float 6s infinite ease-in-out;
}

.circle:nth-child(1){
    width:90px;
    height:90px;
    top:20%;
    left:15%;
}

.circle:nth-child(2){
    width:60px;
    height:60px;
    top:65%;
    left:75%;
    animation-duration:4s;
}

.circle:nth-child(3){
    width:120px;
    height:120px;
    top:80%;
    left:35%;
    animation-duration:7s;
}

@keyframes float{
    0%{transform:translateY(0);}
    50%{transform:translateY(-40px);}
    100%{transform:translateY(0);}
}
</style>
</head>
<body>

<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>

<div class="container">
    <h1>404</h1>
    <h2>TalentHub - Page Not Found</h2>
    <p>Oops! This page doesn’t exist or has been moved.</p>
    <a href="../">Back to Home</a>
</div>

</body>
</html>
