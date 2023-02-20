<h1>Active account page</h1>
<form action="{{ url("/api/active") }}" method="POST">
  <lable>Email</lable>
  <input type="email" name="email" placeholder="plase write your email">
    <lable>Code</lable>
  <input type="number" name="code" placeholder="plase write your code">
  <input type="submit" value="active">
</form>