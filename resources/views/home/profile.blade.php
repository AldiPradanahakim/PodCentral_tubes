<div>
    <h1>Profile</h1>
    <a href="/home">Back</a>
</div>
<div>
    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
</div>