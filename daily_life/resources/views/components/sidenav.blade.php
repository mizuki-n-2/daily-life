<div class="sidenav">
  <h1 class="logo">Daily Life</h1>
  <ul>
    <li>
      <i class="far fa-user"></i>
      {{ Auth::user()->name }}
    </li>
    <li><a href="/todo">toDoリスト</a></li>
    <li><a href="/memo">メモ</a></li>
    <li><a href="">日記</a></li>
    <li>
      <div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>      
</div> 