import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterEventnewsletter'
})
export class filterEventnewsletter implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.email.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}