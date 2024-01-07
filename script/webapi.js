export function getApi() {
    fetch("https://fake-coffee-api.vercel.app/api")
        .then((res) => res.json())
        .then((data) => console.log(data));
}