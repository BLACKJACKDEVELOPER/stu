


function init() {

	function base64(file) {
		return new Promise((resolve,reject)=> {
			const reader = new FileReader()
			reader.readAsDataURL(file)
			reader.onload = ()=> resolve(reader.result)
			reader.onerror = ()=> reject(false)
		})
	}

	return {
		async getFile() {
			const file = document.createElement('input')
			file.setAttribute('type','file')
			file.setAttribute('accept','.jpg,.jpeg,.png')
			file.addEventListener('change',async ()=> {
				const data = await base64(event.target.files[0])
				document.getElementById('preview').src = data
				const container_data = document.getElementById('file')
				container_data.setAttribute('value',data.split(';base64,').pop())
				return
			})
			file.click()
		}
	}

}

const p = new init()