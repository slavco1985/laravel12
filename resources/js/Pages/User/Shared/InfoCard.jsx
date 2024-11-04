import React, { useEffect } from 'react';

const InfoCard = ({icon, count, title}) =>{
    return (
        <div className="col-md-4">
            <div className="user-widg">
                <div className="icon">
                    <i className={`bi ${icon}`}></i>
                </div>
                <div className="detail">
                <h6>{count}</h6>
                <p>{title}</p>
                </div>
            </div>
        </div>
    )
}
export default InfoCard