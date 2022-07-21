export async function requestContent(url) {
  const response = await fetch(url, {
    method: "GET",
    mode: "no-cors",
  });

  return response.json();
}
