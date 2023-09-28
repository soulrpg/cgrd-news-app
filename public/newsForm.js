function switchToCreateForm() {
    const createForm = document.querySelector('#create-form')
    const updateForm = document.querySelector('#update-form')
    createForm.classList.remove('hidden')
    updateForm.classList.add('hidden')
}

function switchToUpdateForm(id, title, description) {
    const createForm = document.querySelector('#create-form')
    const updateForm = document.querySelector('#update-form')
    createForm.classList.add('hidden')
    updateForm.classList.remove('hidden')

    const form = updateForm.querySelector('form')
    form.action = `/update-news/${id}`
    form.querySelector('#title-edit').value = title
    form.querySelector('#description-edit').innerHTML = description
}

document.addEventListener('DOMContentLoaded', function () {
    const editBtns = document.querySelectorAll('.edit-icon')
    for (const editBtn of editBtns) {
        editBtn.addEventListener('click', function (e) {
            const news = e.target.closest('.news')
            const newsId = news.id
            const newsTitle = news.querySelector('.title').innerHTML
            const newsDescription = news.querySelector('.description').innerHTML
            switchToUpdateForm(newsId, newsTitle, newsDescription)
        })
    }

    const deleteBtns = document.querySelectorAll('.delete-icon')
    for (const deleteBtn of deleteBtns) {
        deleteBtn.addEventListener('click', function (e) {
            deleteBtn.submit()
        })
    }

    const closeBtn = document.querySelector('#close-edit')
    closeBtn.addEventListener('click', function (e) {
        switchToCreateForm()
    })
})