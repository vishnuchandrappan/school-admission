import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form } from "antd";

const { Item } = Form;

export const SchoolName = () => {
    const { school, setSchool } = useContext(DataContext);

    return (
        <Item
            name="school"
            label="Name of School in which the applicant studied for SSLC or equivalent"
            rules={[
                {
                    required: true,
                },
            ]}
        >
            <Input
                value={school}
                onChange={setSchool}
                type="text"
                placeholder="School name"
            />
        </Item>
    );
};
