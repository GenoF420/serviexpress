<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Reserva de Horas</h6>
                        <a class="text-white text-capitalize ps-3" href="/intranet/bookings/new">Nuevo</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <?php if(isset($_GET['data'])) { ?>
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Patente
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Fecha
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Estado
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <span class="text-secondary text-xs font-weight-bold">AABB11</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">01/10/23</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">En Espera</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{% url 'intranet_booking' identifier=booking.id %}" class="text-secondary font-weight-bold text-xs"
                                       data-toggle="tooltip" data-original-title="Edit user">
                                        Editar
                                    </a>
                                    |
                                    <a href="{% url 'intranet_booking_delete' identifier=booking.id %}"
                                       class="text-secondary font-weight-bold text-xs"
                                       data-toggle="tooltip" data-original-title="Edit user">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                            <?php } else { ?>
                        </table>
                        <div class="col-lg-12 col-md-10 mx-auto">
                            <div class="card mt-4">
                                <div class="alert alert-secondary alert-dismissible text-white"
                                     role="alert">
                                    <span class="text-sm">No hay reservas en el sistema.</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>