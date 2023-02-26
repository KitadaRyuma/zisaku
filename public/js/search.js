async function search_ay() {
    try {
        const storesearch = document.getElementById('storesearch').value;
        const params = { search: storesearch};
        const query = new URLSearchParams(params);
        const url = `http://localhost/api/search?${query}`;
        // method:POSTなのかGETなのかの決定　,body:登録なら登録させたいもの、検索なら検索させたい値を設定するLaravelのリクエストと同じにする
        const method = { method: "GET" };
        // 上記二つの変数をAPI通信の関数に入れる。値が返却されているのであればここで帰ってくる
        // awaitなのでこの関数内では処理を待っている状態
        const test = await fetch(url, method);

        console.log(test);
    } catch (error) {

    }
}