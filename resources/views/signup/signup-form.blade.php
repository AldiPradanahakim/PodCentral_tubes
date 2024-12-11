<form id="signup-form" action="{{ route('signup') }}" method="POST">
    @csrf <!-- Tambahkan ini untuk proteksi CSRF di Laravel -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your first name...">
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email2" name="email" placeholder="name@domain.com">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password2" name="password" placeholder="password...">
    </div>

    <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="confirm password...">
    </div>

    <div class="form-group">
        <a href="#" class="link">Use phone number instead.</a>
    </div>

    <button type="submit" class="btn-submit">Sign Up</button>
</form>