<div class="header fixed-top mb-5">
    <nav class="navbar navbar-expand p-0">
        <div class="container">
            <a class="navbar-brand p-0" href="#">
               <h1 class="text-white"> Hire-Portal</h1>
            </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerLender"
                    aria-controls="navbarTogglerLender"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerLender">
                <div>
                <ul class="navbar-nav m-auto d-none d-lg-flex">
                    {{-- <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('lender.products') ) active @endif " href="{{ route('lender.products') }}">Listing</a>
                    </li> --}}
                </ul>
                </div>
                <div class="d-flex align-items-center">
                <div class="btn-group">
                    <button class="btn d-flex align-items-center dropdown-btn bg-transparent dropdown-toggle ps-0"
                            type="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                        <div class="position-relative rounded-circle overflow-hidden bg-transparent">
                                <div class="customer"><i class="fas fa-user-alt text-white"></i></div>
                        </div>
                    </button>
                    <ul class="dropdown-menu  dropdown-menu-end">
                        <li>
                            <ul class="d-sm-none d-block list-unstyled">
                                {{-- <li><a class="dropdown-item" href="{{ route('lender.products') }}">Listing</a></li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <a
                                    class="dropdown-item"
                                    href="javascript:return void(0)"
                                    onclick="$(this).closest('form')[0].submit()"
                                ><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </form>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </nav>
</div>

