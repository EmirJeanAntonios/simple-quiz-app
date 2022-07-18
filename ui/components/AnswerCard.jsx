import React, { useId } from 'react'

export const AnswerCard = ({answer}) => {
    const id = useId();
  return (
    <div className='py-4 flex gap-4'>
        <input type="radio" name={answer.question_uuid} id={id} />
        <label htmlFor={id}>
            {answer.answer}
        </label>
    </div>
  )
}
