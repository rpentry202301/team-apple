@extends('layouts.app')

@section('title')
商品一覧ページ
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-10 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">商品を検索する</div>
          </div>
          <div class="panel-body">
            <form method="post" action="#" class="form-horizontal">
              <div class="form-group">
                <label for="code" class="control-label col-sm-2">商品名</label>
                <div class="col-sm-9">
                  <input type="text" name="code" id="code" class="form-control input-sm" />
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

    <!-- table -->
    <div class="row">
      <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
        <table class="table table-striped item-list-table">
          <tbody>
            <tr>
              <th>
                <a href="item_detail.html">
                  <img src="../images/1.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../../images/2.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../images/3.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
            </tr>
            <tr>
              <th>
                <a href="item_detail.html">
                  <img src="../images/4.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../images/5.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../images/6.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
            </tr>
            <tr>
              <th>
                <a href="item_detail.html">
                  <img src="../images/7.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../images/8.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
              <th>
                <a href="item_detail.html">
                  <img src="../images/9.jpg" class="img-responsive img-rounded item-img-center" width="200"
                    height="600" /> </a><br />
                <a href="item_detail.html">じゃがバターベーコン</a><br />
                <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;1,380円(税抜)<br />
                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円(税抜)<br />
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection