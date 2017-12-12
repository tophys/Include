<ul class="side-nav fixed">
    <li class="user-details cyan darken-2 avatar">
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
    <li>
        <a href="">
            <i class="material-icons">today</i>Calendário
        </a>
    </li>
    <li>
        <a href="#">
            <i class="material-icons">notifications_active</i>Avisos
        </a>
    </li>
    @ELSEIF (Auth::user()->Interprete())
    <li class="active"><a href="dashboard_interprete.html"><i class="material-icons">dashboard</i>Principal</a></li>
	  <hr class="divider">
	  <li><a href="traducao_prova.html"><i class="material-icons">library_books</i>Provas</a></li>
	  <li><a href="traducao_questao.html"><i class="material-icons">question_answer</i>Questões</a></li>
	  <hr class="divider">
      <li><a href="#"><i class="material-icons">notifications_active</i>Avisos</a></li>
      @ENDIF 
</ul>