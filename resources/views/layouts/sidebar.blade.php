<ul class="side-nav fixed">
<li class="user-details cyan darken-2 avatar avatar-user">
        <img src="{{asset('uploads/avatars/' .Auth::user()->avatar)}}">
        <div class="avatar-text">
            <span class="user-name">{{Auth::user()->name }}</span>
            
            @IF (Auth::user()->Aluno())
            <span class="user-title">Aluno</span>
            @ELSEIF (Auth::user()->Professor())
            <span class="user-title">Professor</span>
            @ELSEIF (Auth::user()->Interprete())
            <span class="user-title">Interprete</span>
            @ENDIF 
        </div>  
    </li>
    @IF (Auth::user()->Professor())
    @IF (Request::is('dashboard/professor'))
    <li class="active">
    @ELSE 
    <li>
    @ENDIF
        <a href="{{ url('dashboard/professor')}}">
            <i class="material-icons text-darken-1">dashboard</i>Principal
        </a>
    </li>
    <hr class="divider">
    @IF (Request::is('gerenciar/turma'))
    <li class="active">
    @ELSE 
    <li>
    @ENDIF
        <a href="{{url('gerenciar/turma')}}">
            <i class="material-icons">people</i>Turmas 
        </a>
    </li>
    @IF (Request::is('gerenciar/prova'))
    <li class="active">
    @ELSE 
    <li>
    @ENDIF
        <a href="{{ url('gerenciar/prova')}}">
            <i class="material-icons">library_books</i>Provas
        </a>
    </li>
    @IF (Request::is('gerenciar/questao'))
    <li class="active">
    @ELSE 
    <li>
    @ENDIF
        <a href="{{url('/gerenciar/questao')}}">
            <i class="material-icons">question_answer</i>Questões
        </a>
    </li>
    <hr class="divider">
    
    @ELSEIF (Auth::user()->Interprete())
    @IF (Request::is('/dashboard/interprete'))<li class="active">@else <li>@endif<a href="{{url('/dashboard/interprete')}}"><i class="material-icons">dashboard</i>Principal</a></li>
	  <hr class="divider">
    @IF (Request::is('/selecionar/prova'))<li class="active">@else <li>@endif<a href="{{ url('/selecionar/prova')}}"><i class="material-icons">library_books</i>Provas</a></li>
    @IF (Request::is('/selecionar/questao'))<li class="active">@else <li>@endif<a href="{{url('/selecionar/questao')}}"><i class="material-icons">question_answer</i>Questões</a></li>

    @ELSEIF (Auth::user()->Aluno())
    @IF (Request::is('/dashboard/aluno'))<li class="active">@else <li>@endif<a href="{{url('/dashboard/aluno')}}"><i class="material-icons">dashboard</i>Principal</a></li>
	  <hr class="divider">
    @IF (Request::is('/selecionar/prova'))<li class="active">@else <li>@endif<a href="{{ url('/realizar/prova')}}"><i class="material-icons">library_books</i>Realizar Provas</a></li>
    

    @ENDIF 
    
</ul>