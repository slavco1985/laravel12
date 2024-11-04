const ActionColumn = ({status, indx, takeAction}) =>{
    if(status == 'Approved'){
        return (<span className="badge text-bg-success">{status}</span>)
    }else if(status == 'Rejected'){
        return (<span className="badge text-bg-danger">{status}</span>)
    }else{
        return (
            <>
                <button onClick={takeAction(indx, 'Approved')} className="btn btn-success btn-sm">Approve</button>
                <button onClick={takeAction(indx, 'Rejected')} className="btn btn-danger ms-2 btn-sm">Reject</button>
            </>
        )
    }
    
}
export default ActionColumn