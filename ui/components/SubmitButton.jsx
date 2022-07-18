import React from 'react'

export const SubmitButton = ({setIsSubmited}) => {
  return (
    <button onClick={() => setIsSubmited(true)} className='bg-green-600 text-white py-4 px-12 rounded-lg'>Submit</button>
  )
}
