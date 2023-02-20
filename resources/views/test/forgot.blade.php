<h1>Forgot password page</h1>
<form action="{{ url("/api/forgot") }}" method="POST">
  <lable>Email</lable>
  <input type="email" name="email" placeholder="plase write your email">
  <input type="submit" value="forgot">
</form>