<?php
/**Điều hướng website */
use Phroute\Phroute\RouteCollector;
use App\Controllers\Admin\ProductController; 
use App\Controllers\User\ProductController as UserProduct;

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$router = new RouteCollector();

/**
 * cú pháp:
 * $router->requestMethod($route, $handler);
 * - Request method: 
 *     + get: kéo dữ liệu về (danh sách sp/chi tiết sp)
 *     + post: đẩy dữ liệu lên sv (thêm mới bản ghi/update dữ liệu)
 *     + delete: gửi request xoá dữ liệu
 *     + any: 
 * 
 * - $route: '/', '/products'
 * - $handler: hàm xử lý logic
 *      + C1: viết trực tiếp code logic
 *      + C2: điều hướng đến file controller tương ứng
 *          $handler = [Namespace\TenClass::class,'tenFunction'];
 */

//khởi tạo filter để kiểm tra đăng nhập cho 1 số route nhất định
$router->filter('auth', function(){
    if(!isset($_SESSION['user']))
    {
        header('Location: /login');

        return false;
    }
});
$router->get('/', [ProductController::class,'getAllProduct']);    # match only get requests
$router->get('/products/{id}/edit', [ProductController::class, 'edit']); //đưa người dùng vào trang sửa sản phẩm
$router->post('/products/{id}/update', [ProductController::class,'update']); //cập nhật dữ liệu vào DB
$router->get('/login', function () {
    echo "Đây là trang đăng nhập";
});    # match only get requests
$router->get('/create-product', function () {
    echo "Day la trang them moi san pham";
}); //trả về giao diện tạo mới sản phẩm
$router->post('/save-product', function () {
    echo "Thêm mới sản phẩm thành công";
}); //đẩy dữ liệu lên sv để lưu 
/** Route group 
 * prefix group: đặt tiền tố chung cho 1 nhóm các route
 * filter group: filter cho cả group, các route con cũng sẽ đc áp dụng filter
*/
$router->group(['before' => 'auth', 'prefix' => '/admin'], function ($router) {
    $router->get('/users', function () {
        echo "Đây là trang quản lý user";
    });
    $router->get('/products', function () {
        echo "Đây là trang quản lý product";
    });
    $router->get('/categories', function () {
        echo "Đây là trang quản lý category";
    });
});
// $router->get('/admin/users', function () {
//     echo "Đây là trang quản lý user";
// });
// $router->get('/admin/products', function () {
//     echo "Đây là trang quản lý product";
// });
// $router->get('/admin/categories', function () {
//     echo "Đây là trang quản lý category";
// });


$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
?>
