const paginate = (followers) => {
  const itemsPerPage = 10 
  const pages = Math.ceil(followers.length / itemsPerPage)

  const newFollowers = Array.from({length:pages})
}

export default paginate
