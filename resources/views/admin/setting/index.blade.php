@extends('admin.layouts.app')

@section('section_name')
  Setting
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')

  <form action="{{ route("setting.store") }}" method="POST">
  @csrf
    <div class="lists" style="flex-direction: column">
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Current Version</lable>
                <input name="currentversion" value="{{ $setting->currentversion }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Mini Version</lable>
                <input name="minversion" value="{{ $setting->minversion }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Update link</lable>
                <input name="update_link" value="{{ $setting->update_link }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Force update</lable>
                <select name="force_update">
                  <option value="true" {{ $setting->force_update == "true" ? "selected" : "" }}>True</option>
                  <option value="false" {{ $setting->force_update == "false" ? "selected" : "" }}>False</option>
                </select>
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Virasti link</lable>
                <input name="virasti_link" value="{{ $setting->virasti_link }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Bale link</lable>
                <input name="bale_link" value="{{ $setting->bale_link }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Support link</lable>
                <input name="support_link" value="{{ $setting->support_link }}" type="text">
            </div>
        </div></br>
        <div class="ping-blocks">
            <div class="item-ping" style="width: 100%">
                <lable>Message</lable>
                <input name="message" value="{{ $setting->message }}" type="text">
            </div>
        </div></br>
    </div>
    <br>
    <input type="submit" value="Update" id="add_ping">
  </form></br>
  
  
  <form action="{{ route("setting.social.store") }}" method="POST">
  @csrf
    <h1 style="color: #333">Add Split</h1>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Url</th>
                <th>Platform</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socials as $social)
                <tr>
                    <td>{{ $social->id }}</td>
                    <td>{{ $social->url }}</td>
                    <td>{{ $social->platform }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="lists" style="flex-direction: column">
          <div class="ping-blocks">
              <div class="item-ping">
                  <lable>Platform</lable>
                  <input name="platform" type="text">
              </div>
              <div class="item-ping">
                  <lable>Url</lable>
                  <input name="url" type="text">
              </div>
          </div></br>
    </div>
    <br>
    <input type="submit" value="add" id="add_ping">
  </form></br>
  
   <form action="{{ route("setting.dns.store") }}" method="POST">
   @csrf
    <h1 style="color: #333">Add DNS</h1>
    <table id="dns" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>DNS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dns as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->dns }}</td>
                </tr>
            @endforeach
        </tbody>
    </table></br>
    <div class="lists" style="flex-direction: column">
          <div class="ping-blocks">
              <div class="item-ping" style="width: 100%">
                  <lable>DNS</lable>
                  <input name="dns" type="text">
              </div>
          </div></br>
    </div>
    <br>
    <input type="submit" value="add" id="add_ping">
  </form>
        <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
                $(document).ready(function() {
            $('#dns').DataTable();
        });
        </script>
@endsection
