let activePage = ""
//const pageChangeEvent = new Event("TabChange");
let pageLength=0;


function showTab(tabId) {
    // Hide all tab content
     const contents = document.querySelectorAll(".tab-content");
     contents.forEach(content => {
         content.style.display = "none";
     });

    document.getElementById(tabId).style.display = "block";
    activePage=tabId;

}

let currentPage = 1;
const rowsPerPage = 5;


async function fetchdata(url) {
    const res =  await fetch(url)
    if (!res.ok) {
        throw new Error('Network response was not ok');
    }
    const data = await res.json();
    return data;
  
}

async function displayUsers(page){
    const users = await fetchdata('/user/index');
    pageLength = users.length;

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedUsers = users.slice(start, end);

    const userList = document.getElementById("user-list");
    userList.innerHTML = "";

    paginatedUsers.forEach(data => {
        const row = document.createElement("div");
        row.classList.add("user-row");
        row.id = "user-delete-" + data.UID;
        row.innerHTML = `
            <span>${data.FirstName} ${data.LastName}</span>
             <span>${data.UID}</span>
             <span>${data.Username}</span>
            <span>${data.Email}</span>
            <span>${data.RegisteredAt}</span>
            <span>${data.Country}</span>
            <span>
                <div id="essay-Delete-${data.EssayId}">
                    <input id="delete-${data.EssayId}" name="EssayId" type="hidden" value="${data.EssayId}"></input>
                    <button class="delete-button" id="delete-Button-${data.EssayId}"type="submit">Delete!</button>
                </div>
            </span>
           
        `;


        userList.appendChild(row);
    });
}

async function displayEssays(page) {
    
    const essays = await fetchdata('/essay/index');
    pageLength = essays.length;

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedUsers = essays.slice(start, end);

    const userList = document.getElementById("essay-list");
    userList.innerHTML = "";

    paginatedUsers.forEach(data => {
        const row = document.createElement("div");
        row.classList.add("user-row");
        row.id = "user-delete-" + data.EssayId;
        row.innerHTML = `
            <span>${data.EssayId}</span>
             <span>${data.StudentId}</span>
            <span>${data.EssayLanguage}</span>
            <span>${data.SubmittedAt}</span>
            <span>${data.GradedBy}</span>
            <span>
                <div id="essay-Delete-${data.EssayId}">
                    <input id="delete-${data.EssayId}" name="EssayId" type="hidden" value="${data.EssayId}"></input>
                    <button class="delete-button" id="delete-Button-${data.EssayId}"type="submit">Delete!</button>
                </div>
            </span>
           
        `;


        userList.appendChild(row);
    });

    
}

function nextPage() {
    console.log("KAKA->")
    if (currentPage * rowsPerPage < pageLength.length) {
        currentPage++;
        showTab(activePage)
        displayUsers(currentPage);
    }
}

function prevPage() {
    console.log("<-KAKA")
    if (currentPage > 1) {
        currentPage--;
        showTab(activePage)
        displayUsers(currentPage);
    }
}







document.addEventListener("DOMContentLoaded", async () => {
    //console.log(await fetchdata('/essay/index'));
    
    showTab('essay-management');
    if(activePage="essay-management"){
        await displayEssays(currentPage);
        await displayUsers(currentPage);
        document.getElementById("page-info").innerHTML = `Page ${currentPage} of ${Math.ceil(pageLength / rowsPerPage)}`;

        console.log(pageLength)
    } 



    const Essayforms = document.querySelectorAll('div[id^="essay-Delete-"]'); // Select all forms with IDs starting with "user-Delete-"
    
    Essayforms.forEach(div => {
        
        const deleteButton = div.querySelector('.delete-button');
       
        deleteButton.addEventListener('click', async function(event) {
            event.preventDefault(); // Prevent the default form submission
            const essayId = div.querySelector('input[type="hidden"]').value;
            const formData = new FormData();
            formData.append("EssayId",  essayId);
            
            formData.forEach((value,key)=>{
                console.log(`${key} : ${value}`);
            })

            await fetch('/essay/delete', {
                method: 'POST',
                body: formData
            })
            //.then(response=>response.json())
            .then((response)=>{
                    if(response.ok){
                    //div.remove();
                    
                     showTab('essay-management');
                     if(activePage==="essay-management"){
                        
                         displayEssays(currentPage);
                     } 
                }
                }     
            )
            .catch(error => {
                console.error('Error:', error);
                //document.getElementById('result').innerHTML = '<p>Error retrieving data.</p>';
            });
            
            
        });
    });

    
});

