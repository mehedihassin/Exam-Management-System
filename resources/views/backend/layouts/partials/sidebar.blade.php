<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Start Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->
        {{-- subject start --}}
       @can('admin_controller')
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse"
            href="{{ route('subject_index') }}">
            <i class="fa-solid fa-book"></i><span>Subject</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav1">
            <li>
                <a href="{{ route('subject_create') }}">
                    <i class="bi bi-circle"></i><span>Add Subject</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subject_index') }}">
                    <i class="bi bi-circle"></i><span>Subject List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subject_trash') }}">
                    <i class="bi bi-circle"></i><span>Subject Trash</span>
                </a>
            </li>

        </ul>
    </li>
       @endcan
        {{-- subject end --}}

        {{-- topic start --}}
      @can('admin_controller')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-navTopic" data-bs-toggle="collapse"
            href="{{ route('topic_index') }}">
            <i class="fa-solid fa-note-sticky"></i><span>Topic</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-navTopic" class="nav-content collapse " data-bs-parent="#sidebar-navTopic">
            <li>
                <a href="{{ route('topic_create') }}">
                    <i class="bi bi-circle"></i><span>Add Topic</span>
                </a>
            </li>
            <li>
                <a href="{{ route('topic_index') }}">
                    <i class="bi bi-circle"></i><span>Topic List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('topic_trash') }}">
                    <i class="bi bi-circle"></i><span>Topic Trash</span>
                </a>
            </li>

        </ul>
    </li>
      @endcan
        {{-- topic end --}}

        {{-- question section start --}}
     @can('admin_controller')
     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse"
            href="{{ route('question_index') }}">
            <i class="fa-solid fa-question"></i><span>Question</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav2">
            <li>
                <a href="{{ route('question_create') }}">
                    <i class="bi bi-circle"></i><span>Add Question</span>
                </a>
            </li>
            <li>
                <a href="{{ route('question_index') }}">
                    <i class="bi bi-circle"></i><span>Questions List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('question_trash') }}">
                    <i class="bi bi-circle"></i><span>Question Trash</span>
                </a>
            </li>
        </ul>
    </li>
     @endcan
        {{-- question section end --}}
        {{-- exam section start --}}
       @can('admin_controller')
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse"
            href="{{ route('question_index') }}">
            <i class="fa-solid fa-newspaper"></i><span>Exam</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav3">
            <li>
                <a href="{{ route('exam_create') }}">
                    <i class="bi bi-circle"></i><span>Create Exam</span>
                </a>
            </li>
            <li>
                <a href="{{ route('exam_index') }}">
                    <i class="bi bi-circle"></i><span>Exam List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('exam_trash') }}">
                    <i class="bi bi-circle"></i><span>Exam Trash</span>
                </a>
            </li>
        </ul>
    </li>
       @endcan
        {{-- exam section end --}}

        {{--Exam request section start --}}
      @can('admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-navExamRequest" data-bs-toggle="collapse"
            href="{{ route('exam_request_index') }}">
            <i class="fa-solid fa-code-pull-request"></i><span>Exam Request</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-navExamRequest" class="nav-content collapse " data-bs-parent="#sidebar-navExamRequest">
            <li>
                <a href="{{ route('exam_request_index') }}">
                    <i class="bi bi-circle"></i><span>Exam Request List</span>
                </a>
            </li>
        </ul>
    </li>
      @endcan
        {{--Exam request section end --}}

          {{--Role section start --}}
         @can('admin')
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-navRole" data-bs-toggle="collapse"
                href="{{ route('role_index') }}">
                <i class="fa-solid fa-dice-d6"></i><span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-navRole" class="nav-content collapse " data-bs-parent="#sidebar-navRole">
                <li>
                    <a href="{{ route('role_create') }}">
                        <i class="bi bi-circle"></i><span>Add Role</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('role_index') }}">
                        <i class="bi bi-circle"></i><span>Role List</span>
                    </a>
                </li>
            </ul>
        </li>
         @endcan
        {{--Role section end --}}

          {{--user start --}}
        @can('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-navUser" data-bs-toggle="collapse"
                href="{{ route('user_index') }}">
                <i class="fa-solid fa-users"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-navUser" class="nav-content collapse " data-bs-parent="#sidebar-navUser">
                <li>
                    <a href="{{ route('user_create') }}">
                        <i class="bi bi-circle"></i><span>Create User</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user_index') }}">
                        <i class="bi bi-circle"></i><span>User List</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        {{-- result start --}}
       @can('examinee')
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-navUserResult" data-bs-toggle="collapse"
            href="{{ route('result_index') }}">
            <i class="fa-solid fa-square-poll-horizontal"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-navUserResult" class="nav-content collapse " data-bs-parent="#sidebar-navUserResult">
            <li>
                <a href="{{ route('result_index') }}">
                    <i class="bi bi-circle"></i><span>Result List</span>
                </a>
            </li>
        </ul>
    </li>
       @endcan
        {{-- result end --}}

        {{-- all result start--}}
        @can('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-navAllResult" data-bs-toggle="collapse"
                href="{{ route('all_result_index') }}">
                <i class="fa-solid fa-square-poll-horizontal"></i><span>All Result</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-navAllResult" class="nav-content collapse " data-bs-parent="#sidebar-navAllResult">
                <li>
                    <a href="{{ route('all_result_index') }}">
                        <i class="bi bi-circle"></i><span>All Result</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
{{-- all result end --}}

        {{--user end --}}
        <!-- End Components Nav -->
        {{-- <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
    </ul>

</aside>
