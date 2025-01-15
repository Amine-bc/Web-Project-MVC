    <style>

        .cofc{
            margin-top: 50px;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        .containerLogin {
            max-height: 1000px;
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;


        }

        .containerLogin h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .containerLogin input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .containerLogin button {
            width: 100%;
            padding: 10px;
            background-color: #16C47F;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .containerLogin button:hover {
            background-color: #FFD65A;
        }
        .containerLogin a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>


<div class="cofc">

    <div class="containerLogin">
    <h1>Login</h1>
    <form method="post">
        <input  placeholder="Email" name="email" required>
        <input  type= "password" placeholder="Password" name="password" required>
        <button type= "submit">Login</button>
    </form>
    <a href="/register">Don't have an account? Register</a>
</div>
</div>
