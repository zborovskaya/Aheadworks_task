import { useForm } from "react-hook-form";

export default function TicketForm() {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const onSubmit = (data) => {
        fetch(`/api/ticket`, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                console.log('response', response)
                if (response.status === 201) {
                    alert('Data saved');
                }
                if (!response.ok) {
                    throw new Error(response.statusText)
                }
                return response.json()
            })
            .then((json) => {
                console.log('Тут хочу получить json', json)
            })
    };


    return (
        <form onSubmit={handleSubmit(onSubmit)}>
            <labe>Uid</labe>
            <p>
                <input {...register("uid")} />
            </p>
            <labe>Subject</labe>
            <p>
                <input {...register("subject")} />
            </p>
            <labe>Name</labe>
            <p>
                <input {...register("user_name")} />
            </p>
            <labe>Email</labe>
            <p>
                <input {...register("user_email")} />
            </p>
            {errors.exampleRequired && <span>This field is required</span>}
            <input type="submit" />
        </form>
    );
}
