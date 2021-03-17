<div class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <footer>
                    <div class="row">
                        <div class="col-sm-3">
                            <h2>Deliveboo</h2>
                            <p>Via Roma, 2</p>
                            <small>Tel: 06/0175638</small>
                        </div>
                        <div class="col-sm-3">
                            <h3>Links</h3>
                            <div>
                                <ul>
                                    <li>
                                        <a href="{{route('home')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost:8000/#category">Ristoranti</a>
                                    </li>
                                    <li>
                                        <a href="">Contact Us</a>
                                    </li>
                                    <li>
                                        @auth
                                        <a href="{{route('login')}}">Dashboard</a>
                                        @else
                                        <a href="{{route('register')}}">Sign Up</a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h3>Our Github</h3>
                            <div>
                                <ul>
                                    <li>
                                        <a href="https://github.com/SavignanoFrancesco">Francesco Savignano</a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/FrancescoBello">Francesco Bello</a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/carmine19">Carmine Pepiciello</a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/ghillahill">Alberto Bertollo</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h3>Tech Stack</h3>
                            <div class="social d-flex">
                                <i class="fab fa-js-square"></i>
                                <i class="fab fa-laravel"></i>
                                <i class="fab fa-bootstrap"></i>
                                <i class="fab fa-github"></i>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>