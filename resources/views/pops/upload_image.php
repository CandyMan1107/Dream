<html>
   <body>
      <form action="showUploaded" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
      </form>
   </body>
</html>
{!! Form::open(
    array(
        'route' => 'admin.products.store',
        'class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

<div class="form-group">
    {!! Form::label('Product Name') !!}
    {!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}
</div>

<div class="form-group">
    {!! Form::label('Product SKU') !!}
    {!! Form::text('sku', null, array('placeholder'=>'1234')) !!}
</div>

<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Product!') !!}
</div>
{!! Form::close() !!}
</div>
