<form class="login-form" action="{{ route('login') }}" method="POST">
    @csrf
    <label for="email">Email address</label>
    <input type="email" id="email1" name="email" placeholder="name@domain.com...">

    <label for="password">Password</label>
    <input type="password" id="password1" name="password" placeholder="password...">

    <a href="#" class="alternative-login">Use phone number instead.</a>
    
      <button  type="submit" class="login-button">Login</button>

</form>