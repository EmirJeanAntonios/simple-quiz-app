import { useState } from "react";
import QuestionCard from "../../components/QuestionCard";
import { SubmitButton } from "../../components/SubmitButton";
import httpClient from "../../services/httpClient";

export default function questionare({ questionare }) {
  const [isSubmited,setIsSubmited] = useState(false);

  if (!isSubmited) {
    return (
      <div className="grid grid-cols-12">
        {questionare &&
          questionare.map((question) => {
            return (
              <QuestionCard answers={question.answers} question={question} />
            );
          })}
        <div className="col-start-10 col-end-12 py-16">
          <SubmitButton setIsSubmited={setIsSubmited}/>
        </div>
      </div>
    );
  }

  
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
