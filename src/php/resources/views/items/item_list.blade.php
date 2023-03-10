@extends('layouts.app')

@section('title')
商品一覧ページ
@endsection

@section('content')

<div id="youtube-wrap">

<div id="youtube-wrap">
  <div id="youtube" data-property="{
			videoURL: 'https://www.youtube.com/watch?v=3231gqH9Wao',
			containment: '#youtube-wrap',
			autoPlay: true,
			loop: 1,
			mute: true,
			startAt: 0,
			opacity: 0.5,
			showControls: false,
			showYTLogo: false
	}"></div>
</div>


  <div class="row">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-10 col-xs-12">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">商品を検索する</div>
        </div>
        <div class="panel-body">
          
          <form action="/search" class="form-horizontal">
            @csrf
            <div class="form-group">
              <label for="code" class="control-label col-sm-2">キーワード</label>
              <div class="col-sm-9">
                <input type="text" name="keyword" id="keyword" class="form-control input-sm" />
              </div>
            </div>
            <div class="text-center">
              <button type="submit" value="検索" class="btn btn-primary">
                検索
              </button>
              <button type="reset" value="クリア" class="btn btn-default">
                クリア
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
      <!--繰り返し処理で商品情報一覧を表示-->
      <table class="table table-striped item-list-table">
        <tbody>
          <tr>
            @foreach ($items as $item)
            <th>
              <a href="/item/{{$item->id}}">
                <img src="../images/{{$item->id}}.jpg" class="img-responsive img-rounded item-img-center" width="200"
                height="600" /> </a><br />
                <a href="/item/{{$item->id}}">{{$item->name}}</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;{{$item->price_m}}(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;{{$item->price_l}}(税抜)<br />
              </th>
              @endforeach
          </tr>
        </tbody>
      </table>
      <!-- ページングボタン -->
      <div class="text-center">
        {{ $items->withQueryString()->links() }}
      </div>
    </div>
  </div>



  <script>
    $('#youtube').YTPlayer();
  </script>
  @endsection
