@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')

    <!-- general form elements -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-warning">

        <div class="box-header with-border">
            <h3 class="box-title">Document Creation Form</h3>
        </div>
        <br>

        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

            <form method="POST" action="creation_list">
                {{ csrf_field() }}
                <input type="hidden" name="user" value=" {{ Auth::user()->id }} ">
                <table class="table">
                    <tr>
                        <th>Document Title:</th>
                        <th>Version Number:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="doctitle">
                        <td><input type="text" class="form-control" name="version" value="1.0" readonly ></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date of Effectivity:</th>
                        <th>Classification:</th>  
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control" name="effectdate"></td>
                        <td>
                            <select class="form-control" name="classification" >
                                <option value=""></option>
                                <option value="Quality Policy Manual (QPM)">Quality Policy Manual (QPM)</option>
                                <option value="Procedures Manual (PM)">Procedures Manual (PM)</option>
                            </select>
                        </td>          
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea class="form-control" rows="20" name="docparts" placeholder="Include your remarks/notes here"></textarea>
                        </td>
                    </tr> 
                </table>

  			<input type="file" id="myFile" name="filename">

		<p></p>
		<p></p>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="change_request_list" class="btn btn-default">Cancel</a>
                </div>
            </form>

        </div>
        <!-- /.box-body -->

    </div>



    <!-- /.box -->
@endsection
