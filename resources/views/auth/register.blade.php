@extends("layouts.body")

@section("title", "Register")

@section("content")
    <div class="main main_login">

        <h1>Sign up</h1>
        <div class="wrapper">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">What type of user are you ?</h2>
                    <div class="form-radio">
                        <input type="radio" name="member_level" value="newbie" id="newbie" checked="checked" />
                        <label for="newbie">User</label>

                        <input type="radio" name="member_level" value="average" id="average" />
                        <label for="average">Admin</label>
                    </div>

                    <div class="form-textbox">
                        <label for="name">Full name</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="{{ route("login") }}" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>
@endsection
