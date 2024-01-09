 var elem = document.querySelector('.grid');
var infScroll = new InfiniteScroll( elem, {
    path: 'http://localhost/lpress_semifinal/admin/zoom/type=upcoming/page={{#}}',
    append: 'tbody tr',
    history: true,
    status: '.page-load-status'
});