const url = `https://jsonplaceholder.typicode.com/todos`
let dataColumn = document.getElementById('data')
let pageData

pageData = ``
fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log(data)

        data.forEach(element => {
            pageData += `<tr class="hover:bg-gray-100">
            <td class="py-2 px-4">${element.id}</td>
            <td class="py-2 px-4">${element.title}</td>
            </tr>`;
        })

        dataColumn.innerHTML = pageData
    })
    .catch(e => {
        dataColumn.innerHTML = e
    })
