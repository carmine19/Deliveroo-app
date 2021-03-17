<div id="dasboard-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-top">
                        <div class="title">
                            <h1>Ciao {{Auth::user()->company_name}},</h1>
                            <p>Questa è la tua dashboard, qui puoi trovare i tuoi contenuti</p>
                            <a href="{{route('admin.home')}}" class="btn btn-light mt-5">Back-Office</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="dasboard-panel-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 mb-2">
                    <div class="main-box">
                        <div class="box-contain">
                            <div class="box-img mb-2">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                            <div class="box-title">
                                <h3><a href="">Utente</a></h3>
                            </div>
                            <div class="box-content">
                                <p>descrizione</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
