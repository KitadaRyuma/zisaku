// 非同期通信の宣言
async function favorite_ay(comment_id,user_id,clickButtonNum) {
    try {
        const params = { comment_id: comment_id , user_id: user_id};
        const query = new URLSearchParams(params);
        const url = `http://localhost/api/favorite?${query}`;
        // method:POSTなのかGETなのかの決定　,body:登録なら登録させたいもの、検索なら検索させたい値を設定するLaravelのリクエストと同じにする
        const method = { method: "GET" };
        // 上記二つの変数をAPI通信の関数に入れる。値が返却されているのであればここで帰ってくる
        // awaitなのでこの関数内では処理を待っている状態
        const test = await fetch(url, method);

        const click = document.getElementsByClassName('favo');
        const changeStatus = click[clickButtonNum].innerText == '☆' ?  click[clickButtonNum].innerText = '★' : click[clickButtonNum].innerText = '☆' ;
    } catch (error) {

    }
}
