<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Agendar Hora</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form method="GET" action="/intranet/bookings?data">

                            <div class="input-group input-group-outline mb-3">
                                <input type="hidden" name="data" id="data">

                                <label for="plate"
                                       class="form-label">Patente</label>
                                <input type="text" id="plate"
                                       name="plate" class="form-control">

                                <div class="input-group input-group-static my-3">
                                    <label>Fecha</label>
                                    <input type="datetime-local" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Agendar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>