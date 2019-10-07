<!-- Main Content BackOffice CMS Page Models (Form) -->
<div class="page-wrapper">
    <!-- Fluid -->
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h5 class="txt-dark">Page Model |
                      @if (isset($route_parameters->arg2) AND ($route_parameters->arg2 === strtolower(@CMS_FORMS_ACTIONS_ADD)))
                      <span style="font-size:12pt;" class=" text-success"><i class="fa fa-plus-square"></i> {{@CMS_FORMS_ACTIONS_ADD}}</span>
                      @elseif (isset($route_parameters->arg2) AND ($route_parameters->arg2 === strtolower(@CMS_FORMS_ACTIONS_EDIT)))
                      <span style="font-size:12pt;" class=" text-primary"><i class="fa fa-edit text-primary"></i> {{@CMS_FORMS_ACTIONS_EDIT}}</span>
                      @endif
                 </h5>
            </div>
            <!-- ok  -->
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">
                            <span>BackOffice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <span>CMS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}/cms/page-models">
                            <span>Page Models</span>
                        </a>
                    </li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">@if (isset($data['pagina'][0]->created_at)) {{'Criado: ' . $data['pagina'][0]->created_at->format(@CMS_DATETIME_FORMAT)}} @endif</h6>
                            <!-- Legenda -->
                            <span style="font-size:8pt;"><i class="fa fa-star text-warning"></i> Campos de preenchimento obrigatório</span>
                            <!-- /Legenda -->
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/')}}/cms/page-models" class="btn btn-success btn-outline fancy-button btn-0">Registros</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form action="{{url('/') . str_replace($route_root,'',$route_base) . $route_parameters_text}}" method="post" class="" enctype="multipart/form-data">
                                            <input type="hidden" name="{{@CMS_LARAVEL_IDENTITY_FLOW}}" id="{{@CMS_LARAVEL_IDENTITY_FLOW}}" value="FORM" />
                                            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}" />
                                            <input type="hidden" name="route_base" id="route_base" value="{{$route_base}}" disabled />
                                            <input type="hidden" name="route_parameters" id="route_parameters" value="{{$route_parameters_text}}" disabled />
                                            <input type="hidden" name="temporary_variable_counter" id="temporary_variable_counter" value="@if (isset($relateds['temporary_variable_counter'])){{$relateds['temporary_variable_counter']}}@endif" disabled>
                                            <input type="hidden" name="page_models_id" id="page_models_id" value="@if (isset($data['page_models'][0]['id'])){{$data['page_models'][0]['id']}}@endif">
                                            <div class="cms-standard-group-content">
                                                <h6 style="font-size:12pt" class="text-primary capitalize-font"><i class="fa fa-clipboard"></i> Especificação </h6>
                                                <!-- Errors -->
                                                @if (count($errors) > 0)
                                                @for ($i=0; $i < count($errors->all()); $i++)
                                                <div id="cms-form-errors-{{$i}}" class="label label-warning">
                                                    <span style="font-size:10pt;">{{$errors->all()[$i]}}</span>
                                                    <i style="cursor:pointer;" onclick="$('#cms-form-errors-{{$i}}').remove();"><i class="fa fa-times-circle" style="color:gray;font-size:10pt;"></i> </i>
                                                </div>
                                                @endfor
                                                @endif
                                                <!-- /Errors -->
                                                <hr class="light-grey-hr" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="valor">Nome <i class="fa fa-star text-warning"></i></label>
                                                            <input type="hidden" id="db_nome" name="db_nome" value="@if (isset($data['page_models'][0]->nome)){{$data['page_models'][0]->nome}}@endif" />
                                                            <input type="text" id="nome" name="nome" value="@if (isset($data['page_models'][0]->nome)){{$data['page_models'][0]->nome}}@endif" placeholder="Nome" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <!-- Nestable 2 Start -->
                                                    <div class="col-md-12">
                                                        <h6 style="font-size:12pt" class="text-primary">
                                                            <div class="pull-right">
                                                                <a id="LinkModalWindowMidiasSelect" data-toggle="modal" data-target="#ModalWindowContainerSelect" alt="default" class="btn btn-success btn-outline fancy-button btn-0 btn-xs" data-toggle="tooltip" data-original-title="{{@CMS_FORMS_ACTIONS_ADD}}"> <i class="fa fa-plus-square text-light"></i> {{@CMS_FORMS_ACTIONS_ADD}}</a>
                                                            </div>
                                                            <i class="fa fa-cubes"></i> Containers
                                                        </h6>
                                                        <hr class="light-grey-hr" />
                                                        <div class="dd" id="nestable2">
                                                            <ol class="dd-list" id="cms_place_containers_items">
                                                                @if (isset($data['page_models_items']) AND count($data['page_models_items']) > 0)
                                                                @for ($i = 0; $i < count($data[ 'page_models_items']); $i++)
                                                                <li class="dd-item dd3-item" data-id="{{$data['page_models_items'][$i]['containers_id']}}" id="cms_container_item_{{$data['page_models_items'][$i]['containers_id']}}" style="@if (isset($data['page_models_items'][$i]['ativo']) AND($data['page_models_items'][$i]['ativo'] === @DB_ANSWEDED_QUESTION_NO)){{'opacity: .25;'}}@endif">
                                                                    <div class="dd-handle dd3-handle"></div>
                                                                    <div class="dd3-content">
                                                                        <div>
                                                                            <input type="hidden" name="deleted[]" id="deleted_{{$data['page_models_items'][$i]['containers_id']}}" value="{{@DB_RECORD_DELETED_FALSE}}" />
                                                                            <input type="hidden" name="page_models_items_id[]" id="page_models_items_id_{{$data['page_models_items'][$i]['containers_id']}}" value="{{$data['page_models_items'][$i]['containers_id']}}" />
                                                                            <span class="badge badge-default" style="background-color:#f2f2f2;position:relative;top:-4px;">
                                                                                <span>{{$data['page_models_items'][$i]['nome']}}</span>
                                                                                <span class="badge badge-default" style="font-size:7pt;">{{$data['page_models_items'][$i]['containers_id']}}</span>
                                                                            </span>
                                                                            <a style="float:right;" href="{{url('/')}}/cms/page-models/{{$control_pages['currentpage']}}/{{$route_parameters->arg2}}/{{$route_parameters->arg3}}/{{strtolower(@CMS_FORMS_ACTIONS_DEL)}}/{{$data['page_models_items'][$i]['containers_id']}}" class="mr-25 sa-warning2" data-toggle="tooltip" data-original-title="{{@CMS_FORMS_ACTIONS_DEL}}" value="{{$data['page_models_items'][$i]['containers_id']}}">
                                                                                <i class="fa fa-rash ext-warning"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endfor @endif
                                                            </ol>
                                                        </div>
                                                    </div>
                                                    <!-- /Nestable 2 Stop -->
                                                    <!-- /Row -->
                                                </div>
                                                <div class="form-actions mt-10">
                                                    <button type="submit" class="btn btn-success btn-outline fancy-button btn-0"> Salvar</button>
                                                    <a href="{{url('/')}}/cms/page-models" class="btn btn-danger btn-outline fancy-button btn-0">Cancelar</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p>{{date('Y')}} &copy Backoffice. By DevOnturis</p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
        <!-- /Fluid -->
    </div>
    <!-- /Main Content -->
</div>
<!-- Modal Para o Carregamento dos Containers -->
<div id="ModalWindowContainerSelect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-midias" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button id="button_close_modal_constants" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title"><i class="fa fa-cubes"></i> Containers</h5>
            </div>
            <input type="hidden" name="cms_laravel_identity_flow" id="cms_laravel_identity_flow" value="{{@CMS_LARAVEL_IDENTITY_FLOW}}" />
            <input type="hidden" name="cms_container_ver_mais_total" id="cms_container_ver_mais_total" value="{{@CMS_RECORDS_PER_PAGE}}">
            <input type="hidden" id="cms_save_container_busca" value="">
            <div class="modal-body">
                <!-- Table Magilla Responsive  -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Pesquisar as contantes -->
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <input type="text" class="form-control" id="cms_pesquisar_containers" placeholder="Pesquisar containers" onkeyup="CMSPesquisarContainers(1);">
                        </div>
                        <!-- /Pesquisar as contantes -->
                        <div class="table-wrap">
                            <div>
                                <table id="myTable1" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Componente Utilizado</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody id="cms_place_containers_list">
                                        @if (isset($relateds['containers']) AND (count($relateds['containers']) > 0)) @foreach ($relateds['containers'] as $key => $value)
                                        <tr id="cms_container_item_id_{{$value->id}}" value="{{$value->id}}" ativo="{{$value->ativo}}">
                                            <td id="cms_container_nome_{{$value->id}}" ">{{$value->nome}}</td>
                                        <td id="cms_componente_nome_{{$value->id}}">{{$value->componente}}</td>
                                            <td id="cms_button_container_aplicar_{{$value->id}}">
                                                @if ($value->page_models_items_id === null)
                                                <span class="label label-success" style="cursor:pointer;" onclick="CMSContainersUse({{$value->id}});"><i class="fa fa-check"></i></span> @else
                                                <span class="label label-default"><i class="fa fa-ban"></i></span> @endif
                                            </td </tr>
                                            @endforeach @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Table Magilla Responsive -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. modal -->
