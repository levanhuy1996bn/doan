     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn Nhập</h1>
                    <form method="post" action="index.php?p=hoadonnhap/xuly.php" enctype="multipart/form-data">
                        <fieldset style="float: left; margin-right: 20px;">
                            <legend>Nhập thông tin hóa đơn</legend>
                            <table>
                                <tr>
                                    <td>Mã HĐN</td>
                                    <td><input type="text" placeholder="Mã hóa đơn tự tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td><select name="txtstatus" class="form-control">
                                        <option value="Đã thanh toán">Đã thanh toán</option>
                                        <option value="Chưa thanh toán" selected>Chưa thanh toán</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="text" readonly id="inputSuccess" class="form-control" name="txttotal" value="0"></td>
                                </tr>
                        </table>
                </fieldset>
                <fieldset style="float: left;">
                            <legend>Nhập thông tin sản phẩm</legend>
                <table>
            <tr>
                <td>Id</td>
                <td><input type="text" id="inputSuccess" class="form-control" readonly name="txtid"></td>
            </tr>
            <?php include_once 'add_pro.php'; ?>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="txtimage"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" min="1" placeholder="Số lượng sản phẩm" required title="Nhập số lượng lớn hơn 0" pattern="[0-9]{1,3}" class="form-control" name="txtqty"></td>
            </tr>
            <tr>
                <td>Giảm giá</td>
                <td><input type="number" required placeholder="Giảm giá" title="Giảm giá phải nhỏ hơn 100" min="0" max="99" class="form-control" name="txtdiscount"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" min="1000" placeholder="Đơn giá sản phẩm" required title="Nhập đơn giá phù hợp" pattern="[0-9]{4,10}" class="form-control" name="txtprice"></td>
            </tr>
            <tr>
                <td>Lượt chọn</td>
                <td><input type="number" readonly value="0" class="form-control" name="txtvote"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea cols="50" rows="10" class="form-control ckeditor" name="txtdetail"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;<a href="index.php?p=hoadonnhap/hdn.php" class="btn btn-danger">Hủy bỏ</a>
                    </td>
            </tr>
        </table>
    </fieldset>
                </form>
                </div>                
            </div>
        </div>
