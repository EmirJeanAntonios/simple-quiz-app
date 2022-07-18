import QuestionareCard from "../components/QuestionareCard";
import httpClient from "../services/httpClient";

export default function Home({ questionares }) {
  return (
    <div className="grid grid-cols-4">
      {questionares &&
        questionares.map((questionare) => {
          return <QuestionareCard key={questionare.uuid} questionare={questionare} />;
        })}
    </div>
  );
}

export async function getStaticProps() {
  const questionares = await httpClient.axiosInstance.get("/surveys");
  return {
    props: {
      questionares: questionares.data,
    },
  };
}
