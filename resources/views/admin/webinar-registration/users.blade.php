@extends('layouts.dashboard_admin_webinar-registration')

@section('card-content')
    <div class="row">
        <div class="col-md-6 text-nowrap d-flex align-items-center">
            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                <label class="m-0 mr-2">{{ __('Show') }}
                    <select id="perPage" class="form-control form-control-sm custom-select custom-select-sm">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right dataTables_filter d-flex align-items-center justify-content-end" id="dataTable_filter">
                <label class="mr-2 mb-0">
                    <input id="search" type="search" class="form-control form-control-sm p-0" aria-controls="dataTable" placeholder="{{ __('Search') }}" value="{{ request('search') }}" />
                </label>
                <button id="searchBtn" class="btn btn-primary" type="button">{{ __('Search') }}</button>
            </div>
        </div>
    </div>
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table class="table table-hover my-0" id="dataTable">
            <thead>
            <tr>
                <th>{{ __('No.') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Gender') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $users->firstItem()+$loop->index }}</td>
                    <td><img alt="profpict" class="rounded-circle mr-2" width="30" height="30" src="{{ asset('avatars/' . $user->avatar) }}" />{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->category }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>
                        <a href="mailto:{{ $user->email }}" class="btn btn-primary btn-sm mr-2" type="button">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteUser" data-username="{{ $user->name }}" data-userid="{{ $user->id }}" type="button">
                            <i class="fa fa-remove"></i>
                        </button>
                    </td>
                </tr>
            @empty
            {{ __('There is no user registered to this webinar or no matching user') }}
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 align-self-center">
            @if($users->total() > 0)
                <p role="status" aria-live="polite">{{ __('Showing').' '.$users->firstItem().' '.__('to').' '.$users->lastItem().' ('.__('total').' '.$users->total().')'}}</p>
            @endif
        </div>
        <div class="col-md-6 d-lg-flex justify-content-lg-end">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="cofirmDeleteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{ __('Unregister User') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-body"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No') }}</button>
                    <button type="submit" class="btn btn-danger" id="deleteUserBtn">{{ __('Yes') }}</button>
                </div>
            </div>
        </div>
    </div>

    <form class="d-none" id="formDeleteUser" method="POST" action="{{ route('admin.webinar.registration.users.unregister', [ 'webinar' => $webinar ]) }}">
        @csrf
        <input hidden type="text" name="userid" />
    </form>
@endsection

@section('custom-script')
    <script>
        var selectedUserId = 0;
        var selectedUserName = "";
        var isTrigger = false;
        $('#confirmDeleteUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            selectedUserId = button.data('userid');
            selectedUserName = button.data('username');
            var modal = $(this);
            modal.find('#modal-body').text('{{ __('Are you sure want to unregister') }}'+' '+selectedUserName+'?');
        });
        $('#deleteUserBtn').click(function (){
            this.disabled=true;
            var form = $('#formDeleteUser');
            form.append('<input hidden type="number" name="id" value="'+selectedUserId+'" />');
            form.append('<input hidden type="text" name="name" value="'+selectedUserName+'" />');
            form.submit();
        });
        $('#perPage').val({{ request('perPage', 10) }});
        function getQuery(){
            var query = "?";
            var perPage = $('#perPage').val();
            var search = $('#search').val();
            if(perPage != 10)
                query += "perPage="+perPage;
            if (search != '')
                query += (perPage!=10?"&":"")+"search="+search;
            return query;
        }
        function updateQuery() {
            if (!isTrigger){
                isTrigger = true;
                window.location.href = "{{ route('admin.webinar.registration.users', [ 'webinar' => $webinar ]) }}" + getQuery();
            }
        }
        $('#searchBtn').click(function (){
            updateQuery();
        });
        $('#search').keypress(function (e){
            if(e.which === 13){
                updateQuery();
            }
        });
        $('#perPage').on('change', function (){
            updateQuery();
        });
    </script>
@endsection
