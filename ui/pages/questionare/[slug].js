import { useState } from "react";
import QuestionCard from "../../components/QuestionCard";
import { SubmitButton } from "../../components/SubmitButton";
import httpClient from "../../services/httpClient";
import { useRouter } from 'next/router'

export default function questionare({ questionare }) {
  const router = useRouter();
  const questionareFinished = (e) => {
    e.preventDefault();
    router.push({
      pathname: '/submit/[slug]',
      query: { slug: router.query.slug},
      
    })
  }

  return (
    <form onSubmit={questionareFinished} className="grid grid-cols-12">
      {questionare &&
        questionare.map((question) => {
          return (
            <QuestionCard key={question.uuid} answers={question.answers} question={question} />
          );
        })}
      <div className="col-start-10 col-end-12 py-16">
        <SubmitButton />
      </div>
    </form>
  );
}

export async function getServerSideProps({ params }) {
  try {
    const questionare = await httpClient.axiosInstance.get(
      `/survey/${params.slug}`
    );

    return {
      props: {
        questionare: questionare.data,
      },
    };
  } catch (error) {
    return {
      notFound: true,
    };
  }
}
