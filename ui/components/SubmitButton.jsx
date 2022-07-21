import React from 'react'
import { useRouter } from 'next/router'
import { useSelector } from 'react-redux';


export const SubmitButton = () => {
  const router = useRouter()
  const answers = useSelector((state) => {
    return state.answers;
  });
  const buttonClick = e => {
    router.push({
      pathname: '/submit/[slug]',
      query: { slug: router.query.slug},
      
    })
  }

  return (
    <button onClick={buttonClick} className='bg-green-600 text-white py-4 px-12 rounded-lg'>Submit</button>
  )
}
